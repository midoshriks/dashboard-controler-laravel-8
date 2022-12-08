<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View as ViewView;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements
    // FromCollection,
    FromView,
    ShouldAutoSize,
    WithHeadings
{
    public $role;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($role)
    {
        $this->role = $role;
        // dd($role);
    }

    public function headings(): array
    {
        return ["#", "first name", "last naem", "email", "phone", "date of birth", "gender", "country", "role"];
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): ViewView
    {
        return view('dashboard.users.export', [
            // 'users' => User::where('role_permissions', $role)->get(),
            'users' => User::where('role_permissions', $this->role)->get(),
        ]);
    }

    // /**
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function collection()
    // {
    //     $data = User::select(
    //         'id',
    //         'first_name',
    //         'last_name',
    //         'email',
    //         'phone',
    //         'dob_date',
    //         'gender',
    //         'country_id',
    //         'role_permissions',
    //     )->where('role_permissions', 'gaming')->get();

    //     // dd($data);
    //     return $data;
    //     // return User::all();
    // }
}
