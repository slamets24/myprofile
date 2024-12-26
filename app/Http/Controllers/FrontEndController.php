<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Project;
use App\Models\WorkExperience;
use App\Models\Education;
use App\Mail\ContactFormMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::with(['skills', 'projects.technologies', 'socialMedia'])
            ->firstOrFail();

        return view('welcome', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function projects()
    {
        $projects = Project::with(['technologies'])
            ->orderBy('start_date', 'desc')
            ->get();

        return view('projects', compact('projects'));
    }

    public function experience()
    {
        $workExperiences = WorkExperience::orderBy('start_date', 'desc')->get();
        $education = Education::orderBy('start_date', 'desc')->get();

        return view('experience', compact('workExperiences', 'education'));
    }

    public function contact()
    {
        $profile = Profile::with('socialMedia')->firstOrFail();
        return view('contact', compact('profile'));
    }

    public function send(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string'
        ]);

        // Kirim email
        Mail::to(config('mail.from.address'))->send(new ContactFormMail($validated));

        return redirect()->back()->with('success', 'Thank you for your message. I will get back to you soon!');
    }
}
