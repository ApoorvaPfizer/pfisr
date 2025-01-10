
@include('layouts.header')

<main>
  <div class="container py-4">

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
      <form method="POST" action="/">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" class="text-input" type="text" name="name"
                        value="{{ $user->name }}" />                   
                </div>

                <div class="mb-3">
                    <label for="email">email</label>
                    <input id="email" class="text-input" type="text" name="email"
                        value="{{ $user->email }}" />
                </div>
                <div class="">
                    <button class="mt-4">
                        {{ __('Save') }}
                    </button>
                </div>
</main> 
 
  @include('layouts.footer')

