@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-white p-6 rounded-lg mb-6">
                <img src="/uploads/avatars/{{ auth()->user()->avatar }}" alt="test">
            </div>

            <div class="bg-white p-6 rounded-lg">
                <form action="{{ route('profile.update_avatar', auth()->user()) }}" method="post" enctype="multipart/form-data">
                    @csrf                

                    <label for="name" class="sr-only">Select image to upload:</label>
                    <input type="file" name="avatar"  accept=".jpg, .jpeg, .gif, .PNG, .png, .JPG" >
                    <input type="submit" value="Save" name="Avatar" class="bg-blue-500 text-white px-4 py-3 rounded">
                </form>
            </div>
        </div>
    </div>
@endsection
