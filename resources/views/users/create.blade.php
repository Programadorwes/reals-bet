<x-layout>
    <x-users.form :action="route('users.store')" :name="old('name')" :email="old('email')" :password="old('password')" :update="false" />
</x-layout>