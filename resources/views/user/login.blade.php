@extends("layout")

@section("content")
    
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6 text-center">
        <h1 class="font-bold text-xl uppercase">Log In</h1>
        <form method="POST" action="/login" class="bg-gray-100 border border-gray-300 rounded mx-5 max-w-lg p-5 mx-auto text-left">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                <input class="border border-gray-400 p-2 w-full" type="email" name="email" value="{{ old('email') }}" required />
            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
                <input class="border border-gray-400 p-2 w-full" type="password" name="password" required />
            </div>
                        
            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 focus:bg-blue-500">Log In</button>
            </div>
        </form>
    </main>
@endsection