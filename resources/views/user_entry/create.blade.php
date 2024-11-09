<x-app-layout>
    <div class="py-12">
        <div class="content pl-5 pr-5">
            <div class="row p-4">
                <div class="col-md-2"></div>
                <div class="col-md-8 p-5" style="box-shadow: 5px 5px 5px 5px #888888;">
                    <form action="{{ route('user_entry.store') }}" method="POST">
                        @csrf
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2 error_msg" />
                        <br>
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2 error_msg" />
                        <br>
                
                        <button type="submit"  class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
            
        </div>
    </div>
</x-app-layout>
