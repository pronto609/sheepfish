<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $title = 'Companies';
        $companies = Company::paginate(10);
        return view('app.companies.index', compact( 'title', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CompanyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $title = $formName = sprintf('Edit company name: %s', $company->name);

        return view('app.companies.edit', compact(['title', 'company', 'formName']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CompanyRequest  $request
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $input = $request->except('_token', '_method');
        $file = $request->file('logo');
        if ($file) {
            $input['logo'] = $this->filePrepare($file, $company);
        }
        $company->fill($input)->save();
        $request->session()->flash('success', sprintf('Company id: %d updated successfully', $company->id));
        return redirect()->route('companies.index');
    }

    private function filePrepare(UploadedFile $file, Company $company)
    {
        $filename = Str::uuid() . "_" .$file->getClientOriginalName();
        Storage::disk('local')->put('public/'.$filename, file_get_contents($file));
        if ('logo.png' !== $file->getClientOriginalName()) {
            Storage::disk('local')->delete('public/' . $company->logo);
        }
        return $filename;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id, Request $request)
    {
        /** @var Company $company */
        $company = Company::findOrFail($id);
        $company->delete();
        $request->session()->flash('success', sprintf('Company id:%d successfully deleted', $id));
        return redirect()->route('companies.index');
    }
}
