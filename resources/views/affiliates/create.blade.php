<x-layout>
    <x-affiliates.form 
    :action="route('affiliates.store')" 
    :name="old('name')" 
    :cpf="old('cpf')" 
    :birthdate="old('birthdate')" 
    :email="old('email')" 
    :phone="old('phone')" 
    :address="old('address')" 
    :city="old('city')" 
    :state="old('state')" 
    :update="false" />
</x-layout>