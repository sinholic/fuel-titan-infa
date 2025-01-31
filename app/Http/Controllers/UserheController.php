<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserheModel;
use App\Timesheetstatus;
use App\EquipmentModel;

class UserheController extends Controller
{
    public function userhe()
    {
        $userhe = UserheModel::all();
        return view('User HE.userhe', ['userhe' => $userhe]);
    }

    public function tambah()
    {
        $categories = Timesheetstatus::select('id', 'category')->distinct()->get();
        $statuses = [];
        foreach ($categories as $key => $category) {
            $statuses[$category->category] = Timesheetstatus::where('category', $category->category)->pluck('status', 'id');
        }
        $equipments = EquipmentModel::with('equipmentcategory', 'equipmentowner')->get();
        return view('User HE.tambah_userhe', ['statuses' => $statuses, 'equipments' => $equipments]);
    }

    public function create(Request $request)
    {
        $messages = [
            'tanggal_operasi.after_or_equal' => 'Tidak boleh mengisi tanggal kemarin',
        ];

        $lastTimesheet = UserheModel::where('equipment_id', $request->equipment_id)->get()->last();
        $equipment = EquipmentModel::find($request->equipment_id);
        
        $this->validate($request, [
            'tanggal_operasi' => 'required|date|after_or_equal:start_date',
        ], $messages);

        if ($lastTimesheet != NULL) {
            $this->validate($request, [
                // Awal
                'km_awal' => 'nullable|numeric|max:'.$lastTimesheet->km_akhir,
                'km_awal' => 'nullable|numeric|min:'.$lastTimesheet->km_akhir,
                'hm_awal' => 'nullable|numeric|max:'.$lastTimesheet->hm_akhir,
                'hm_awal' => 'nullable|numeric|min:'.$lastTimesheet->hm_akhir,
                // BBM
                'bbm' => 'numeric|max:'.$equipment->fuel_capacity
            ], $messages);
        }
        // dd()
        UserheModel::create($request->all());
        return redirect('/userhe')->with('sukses', 'Data berhasil diinput!');
    }

    public function edit($id)
    {
        $userhe = UserheModel::find($id);
        return view('User HE.edit_userhe', ['userhe' => $userhe]);
    }

    public function update(Request $request, $id)
    {
        $userhe = UserheModel::find($id);
        $userhe->update($request->all());
        return redirect('/userhe')->with('sukses', 'Data berhasil di Update');
    }

    public function delete($id)
    {
        $userhe = UserheModel::find($id);
        $userhe->delete($userhe);
        return redirect('/userhe')->with('sukses', 'Data berhasil dihapus');
    }

    public function detail($id)
    {
        $userhe = UserheModel::find($id);
        return view('User HE.detail_userhe', ['userhe' => $userhe]);
    }
}
