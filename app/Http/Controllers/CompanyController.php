<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Freelancer;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public const PLACEHOLDER = 'https://placehold.co/600x400';
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $companies = Company::whereHas('users', function ($query) use ($userId) {
            $query->where('users.id', $userId);
        })->with('users')->get();

        return view('company.index', ['companies' => $companies]);
    }

    public function show(int $id)
    {
        $company = Company::find($id);
        return view('company.show', ['company' => $company]);
    }

    public function form(Request $request, ?int $id = null)
    {
        $company = [];
        if(!empty($id)) {
            $company = Company::find($id);
            $avatar = $company->avatar;
            $background = $company->background;
        }
        else
        {
            $avatar = $request->session()->get('company.avatar', self::PLACEHOLDER);
            $background = $request->session()->get('company.background', self::PLACEHOLDER);
        }

        return view('company.form', ['company' => $company, 'avatar' => $avatar, 'background' => $background]);
    }

    public function upsert(Request $request, ?int $id = null)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $avatar = $request->session()->get('company.avatar');
        $background = $request->session()->get('company.background');
        if(empty($id))
        {
            $company = Company::create(['name' => $name, 'description' => $description, 'avatar' => $avatar, 'background' => $background]);
            $company->users()->attach($request->user()->id, ['role_id' => 1]);
            $successMessage = 'Company created successfully';
        }
        else
        {
            Company::find($id)->update(['name' => $name, 'description' => $description]);
            if(!empty($avatar))
                Company::find($id)->update(['avatar' => $avatar]);
            if(!empty($background))
                Company::find($id)->update(['background' => $background]);

            $successMessage = 'Company updated successfully';
        }
        $request->session()->remove('company.avatar');
        $request->session()->remove('company.background');

        return response(null)
            ->withHeaders([
                'HX-Redirect' => route('companies')
            ]);
    }

    public function updateAvatar(Request $request, ?int $id = null)
    {
        $path = $request->file('avatar')->store('company_avatar');
        $updateImage = $this->updateImage($request, $path, 'avatar', route("companies.update.avatar", ['id' => $id]), '');
        $updateImage['type'] = 'circular';
        return view ('generic.image', $updateImage);
    }

    public function updateBackground(Request $request, ?int $id  =null)
    {
        $path = $request->file('background')->store('company_background');
        $updateImage = $this->updateImage($request, $path, 'background', route("companies.update.background", ['id' => $id]), '');
        $updateImage['type'] = 'rectangular';
        return view ('generic.image', $updateImage);
    }

    public function updateImage(Request $request, $path, $name, $action, $defaultImage, ?int $id = null)
    {
        if(empty($defaultImage))
            $defaultImage = self::PLACEHOLDER;

        if(!empty($id))
        {
            $company = Company::find($id);
            $company->$name = "/" . $path;
            $company->save();
        }
        else
        {
            $request->session()->put("company.$name", "/" . $path);
        }

        return ['image' => "/" . $path, 'name' => $name, 'action' => $action, 'default_image' => $defaultImage];
    }
}
