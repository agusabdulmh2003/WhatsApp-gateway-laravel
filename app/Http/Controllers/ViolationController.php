<?php

use App\Models\Student;
use App\Models\Guardian;
use App\Models\Violation;
use App\Models\MessageLog;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::with('student')->get();
        return view('violations.index', compact('violations'));
    }

    public function create()
    {
        $students = Student::all();
        return view('violations.create', compact('students'));
    }

    public function store(Request $request)
    {
        $violation = Violation::create([
            'student_id' => $request->student_id,
            'violation_type' => $request->violation_type,
            'violation_date' => $request->violation_date,
            'sanction' => $request->sanction
        ]);

        // Kirim WhatsApp
        $this->sendWhatsApp($violation);

        return redirect()->route('violations.index')->with('success', 'Data berhasil disimpan dan dikirim!');
    }

    private function sendWhatsApp($violation)
    {
        $student = Student::find($violation->student_id);
        $guardian = Guardian::where('id', $student->guardian_id)->first();
        
        $message = "Assalamualaikum, Bapak/Ibu {$guardian->name}. 
        Santri {$student->name} melakukan pelanggaran pada {$violation->violation_date}. 
        Jenis: {$violation->violation_type}. Sanksi: {$violation->sanction}. Terima kasih.";

        // Simpan log pesan
        MessageLog::create([
            'student_id' => $student->id,
            'guardian_id' => $guardian->id,
            'message' => $message,
            'status' => 'sent'
        ]);

        // **Panggil API WhatsApp** (akan dibuat di langkah 5)
        // $this->callWhatsAppAPI($guardian->phone, $message);
    }
}
