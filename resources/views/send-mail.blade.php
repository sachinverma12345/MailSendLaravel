<x-app-layout>
    <div class="py-12">
        <div class="content pl-5 pr-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row p-4">
                <div class="col-md-2"></div>
                <div class="col-md-8 p-5" style="box-shadow: 5px 5px 5px 5px #888888;">
                    <form action="{{ route('email.send') }}" method="POST" >
                        @csrf
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 error_msg" />
                        <br>

                        <label for="message">Message</label>
                        <textarea type="text" class="form-control" id="message" name="message"> </textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2 error_msg" />
                        <br>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>

        </div>
    </div>
</x-app-layout>
