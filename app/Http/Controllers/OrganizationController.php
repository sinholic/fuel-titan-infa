<?php

namespace App\Http\Controllers;

use App\Exports\OrganizationExport;
use Illuminate\Http\Request;
use App\OrganizationModel;
use Maatwebsite\Excel\Facades\Excel;

class OrganizationController extends Controller
{
    public function organization()
    {
        $organization = OrganizationModel::all();
        return view('Organization.organization', ['organization' => $organization]);
    }

    public function tambah()
    {
        return view('Organization.tambah_organization');
    }

    public function create(Request $request)
    {
        OrganizationModel::create($request->all());
        return redirect('/organization')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $organization = OrganizationModel::find($id);
        return view('Organization.edit_organization', ['organization' => $organization]);
    }

    public function update(Request $request, $id)
    {
        $organization = OrganizationModel::find($id);
        $organization->update($request->all());
        return redirect('/organization')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $organization = OrganizationModel::find($id);
        $organization->delete($organization);
        return redirect('/organization')->with('sukses', 'Data Berhasil di Hapus!');
    }

    public function export_excel()
    {
        return Excel::download(new OrganizationExport, 'master_organization.xlsx');
    }
}
