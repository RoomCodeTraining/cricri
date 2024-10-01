
<div class="font-[sans-serif]">
    <div class="flex items-center justify-center min-h-screen px-4 py-6 fle-col">
      <div class="grid items-center w-full max-w-6xl gap-4 md:grid-cols-2">
          <div class="border border-gray-300 rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto" style="background: whitesmoke">
              {{-- <div class="px-6 mb-4" >
            </div> --}}
            <form class="space-y-4" method="POST" action="{{ route('conn') }}">

                @csrf

                <div class="mt-8 mb-8 text-center">
                    <!-- <img src="{{ asset("images/logo.png") }}" alt="" class="justify-center mb-4 "> -->
                    <h3 class="text-3xl font-extrabold text-center text-gray-800 ">FECI MAP</h3>
                    <p class="mt-4 mb-4 text-sm leading-relaxed text-gray-500">
                        La plateforme de toutes les églises de la <strong>FECI</strong>.
                    </p>
                </div>
                <div class='px-16'>
                    @if ($errors->any())
                        <div class="px-16 text-red-700 rounded md:p-5 bg-danger" style="color: red">
                                        <svg class="flex-none inline-block w-5 h-5 mr-3 text-red-500 hi-solid hi-x-circle" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Les informations saisies sont incorrectes.
                        </div>
                    @endif
                </div>

            <div class="mt-2">
              <label class="block mb-2 text-sm text-gray-800">Adresse Email</label>
              <div class="relative flex items-center">
              <input name="email" value="{{ old('email') }}" type="email" class="w-full px-4 py-3 text-sm text-gray-800 border border-gray-300 rounded-lg outline-blue-600" placeholder="Veuillez entrer votre adresse email" required />
              </div>
            </div>
            <div>
              <label class="block mb-2 text-sm text-gray-800">Mot de passe</label>
              <div class="relative flex items-center">
                <input name="password" type="password" required class="w-full px-4 py-3 text-sm text-gray-800 border border-gray-300 rounded-lg outline-blue-600" placeholder="Entrer votre mot de passe" autocomplete="current-password" />
              </div>
            </div>

            <div class="flex flex-wrap items-center justify-between gap-4">
              <div class="flex items-center">
                <input id="remember_me" name="remember" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded shrink-0 focus:ring-blue-500" />
                <label for="remember_me" class="block px-4 ml-3 text-sm text-gray-800">
                  Me garder connecté
                </label>
              </div>

            </div>

            <div class="!mt-8">
              <button type="submit" class="w-full px-4 py-3 text-sm tracking-wide rounded-lg shadow-xl hover:bg-slate-600 focus:outline-none" style="background-color:#ff8600; color:white">
                Me connecter
              </button>
            </div>

          </form>
        </div>
        <div class="lg:h-[500px] md:h-[400px] max-md:mt-8 ">
            <img src="{{ asset('images/logo.png') }}" class="hidden object-cover w-full mx-auto md:block max-md:w-4/5" alt="">
        </div>
        <a style="color:red" href="{{route('home')}}">🚶 Retourner à la page d'accueil !</a>

      </div>
    </div>
  </div>
