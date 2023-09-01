<?php





namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FinancialRecord;

class FinancialRecordController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'prefix' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required|date',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data['last_updated_at'] = now(); 
        $financialRecord = FinancialRecord::create($data);

      
        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $imagePath = $profileImage->store('profile_images', 'public');
            $financialRecord->profile_image = $imagePath;
            $financialRecord->save();
        }

        return redirect()->back()->with('success', 'บันทึกรายการรายรับ/รายจ่ายสำเร็จ');
    }

    public function index()
    {
        $records = FinancialRecord::paginate(20);
        return view('financial_records.v', compact('records'));
    }
}
