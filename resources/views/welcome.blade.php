<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>FECI-Map - JESUS4LIFE</title>
  <meta name="description"
    content="Découvrez toutes les églises évangéliques membres de la Fédération Évangélique de Côte d'Ivoire." />
  <meta name="keywords" content="FECI-Map, JESUS4LIFE, églises évangéliques, Côte d'Ivoire" />

  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <link href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css" rel="stylesheet" />

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

    html {
      font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
  </style>
</head>

<body class="leading-normal tracking-normal text-indigo-400 m-6 bg-cover bg-fixed"
  style="background-image: url('images/header.png');">
  <div class="h-full">
    <!--Nav-->
    <div class="w-full container mx-auto">
      <div class="w-full flex items-center justify-between">
        <a class="flex items-center text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
          FECI-MAP
        </a>

        <div class="flex w-1/2 justify-end content-center">

          <a class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
            href="https://api.whatsapp.com/send?text=Votre%20message">
            <img class="fill-current h-6" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" src="images/svg/icons8-whatsapp.svg">
          </a>


          <a class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
            href="#">
            <svg class="fill-current h-6" viewBox="0 0 32 32">
              <path d="M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z"></path>
            </svg>
          </a>

          <a href="{{ route('panel') }}" class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">
                <img class="fill-current h-6" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" src="images/svg/icons8-settings.svg">
            </a>

        </div>
      </div>
    </div>

    <!--Main-->
    <div class="container pt-24 md:pt-36 mx-auto flex flex-wrap flex-col md:flex-row items-center">
      <!--Left Col-->
      <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
        <h1 class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center md:text-left">
          <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">
            Découvrez
          </span>
          FECI-MAP
        </h1>
        <p class="leading-normal text-white md:text-xl mb-8 text-center md:text-left">
          Une application pour répertorier toutes les églises évangéliques membres de la
          <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500"></span>
          Fédération Évangélique de Côte d'Ivoire (FECI).
          </span></span>
        </p>

        <form class="bg-gray-900 opacity-75 w-full shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
          <div class="mb-4">
            <label class="block text-blue-300 py-2 font-bold mb-2" for="emailaddress">
              Inscrivez-vous à notre newsletter
            </label>
            <input
              class="shadow appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
              id="emailaddress" type="text" placeholder="jeanchristophedibi99@gmail.com" />
          </div>

          <div class="flex items-center justify-between pt-4">
            <button
              class="bg-gradient-to-r from-purple-800 to-green-500 hover:from-pink-500 hover:to-green-500 text-white font-bold py-2 px-4 rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
              type="button">
              Inscrivez-vous
            </button>
          </div>
        </form>
      </div>

      <!--Right Col-->
      <!-- <div class="w-full xl:w-3/5 p-12 overflow-hidden">
        <img
          class="mx-auto w-full md:w-4/5 transform -rotate-6 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6"
          src="images/svg/ivory-coast.svg" />
      </div> -->

      <div class="w-full xl:w-3/5 p-12 overflow-hidden text-white">
        <img
          class="mx-auto w-full md:w-4/5 transform -rotate-6 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6"
          src="images/ci_white.png" />
      </div>

      <div class="mx-auto md:pt-16">
        <p class="text-blue-400 font-bold pb-8 lg:pb-6 text-center">
          Téléchargez notre application :
        </p>
        <div class="flex w-full justify-center md:justify-start pb-24 lg:pb-0 fade-in">
          <img src="images/svg/App Store.svg" class="h-12 pr-12 transform hover:scale-125 duration-300 ease-in-out" />
          <img src="images/svg/Play Store.svg" class="h-12 transform hover:scale-125 duration-300 ease-in-out" />
        </div>
      </div>

      <!--Footer-->
      <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
        <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; </a>
        Developée par
        <a class="text-gray-500 no-underline hover:no-underline" href="#">Jean Christophe
          Dibi & Othniel Djue | Tous droits reservés</a>
      </div>
    </div>
  </div>
</body>

</html>
