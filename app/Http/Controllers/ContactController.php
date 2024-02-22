<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Organization;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contacts = Contact::all();
        //dd($contacts);
        //var_dump($contacts);
        return view('contact.index', ['contacts' => $contacts]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create the contact
        //pass on all fields as a variable
        //$contact = new Contact();
        //$fillables = $contact->getFillable();
        //return view('contact.create', compact('fillables'));
        //passon the organization
        $organizations = Organization::all();
        return view('contact.create',['organizations' => $organizations]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'job_title' => 'required',
            'organization_id' => 'required',
        ]);
        //upload the image and store it in the database
    
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $request->image = $name;
       

        
        //use the new contact to create a new organization
        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->job_title = $request->job_title;
        $contact->organization_id = $request->organization_id;
        $contact->image = $request->image;
        $contact->save();
        //redirect to the index page
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        //show the contact
        $contact = Contact::find($contact);
        //use find or fail
        $contact = Contact::findOrFail($contact);
        //the difference between find and find or fail is that find or 
        //fail will throw an error if the contact is not found
        return view('contact.show', ['contact' => $contact]);

        //use a try catch block
        // try {
        //     $contact = Contact::findOrFail($contact);
        //     return view('contact.show', ['contact' => $contact]);
        // } catch (\Exception $e) {
        //     return redirect()->route('contact.index');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        //edit one contact
        $contact = Contact::find($contact);
        return view('contact.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contact $contact)
    {
        //update contact using the request by first validating the request
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'job_title' => 'required',
            'organization_id' => 'required',
        ]);
        //store the request
        $contact->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact)
    {
        //delete the contact
        $contact->delete();

         // Your delete logic here
    $contact->delete();

    return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }

     // Edit Contact Form Method
     public function editForm(Contact $contact)
     {
         return view('contact.edit_form', compact('contact'));
     }
 
     // Delete Contact Form Method
     public function deleteForm(Contact $contact)
     {
         return view('contact.delete_form', compact('contact'));
     }
}
