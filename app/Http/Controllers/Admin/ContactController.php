<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Library\MyClass;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::realContact()->paginate( MyClass::ADMIN_ROW_COUNT );

        return view('admin.contact.contacts',['contacts' => $contacts]);
    }

    public function info($id)
    {
        $contact = Contact::find($id);

        $contact->read = 1;
        $contact->save();

        return view('admin.contact.contactInfo',['contact' => $contact]);
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->deleted = 1;
        $contact->save();
        
        return redirect("admin/contacts");
    }
}
