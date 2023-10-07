<script>
    // @ts-nocheck
      import { Navbar, NavBrand, NavLi, NavUl, NavHamburger } from 'flowbite-svelte';
    
        import { afterUpdate, onMount } from "svelte";

        let urlBasePHP = "http://127.0.0.1:8888/php-uni/"
    
        let listaEstudio = [];
    
        async function dataEstudio() {
            const response = await fetch(urlBasePHP + "estudios");
            const data = await response.json();
    
            listaEstudio = data
            for(let i = 0; i < data.length; i++) {
                if(data[i].nombre != undefined || data[i].id != undefined ){
                    listaEstudio.push("id: " + data[i].id + " - " + data[i].nombre)
                }
            //console.log(data)
            }
        };
    
        let listaProfesor = [];
    
        async function dataProfesor() {
            const response = await fetch(urlBasePHP + "profesores");
            const data = await response.json();
    
            listaProfesor = data
            for(let i = 0; i < data.length; i++) {
                if(data[i].nombre != undefined || data[i].id != undefined ){
                    listaProfesor.push("id: " + data[i].id + " - " + data[i].nombre)
                }
            //console.log(listaProfesor)
            }
        };
    
        let listaProfesorAsignatura = [];
    
        async function dataProfesorAsignatura() {
            const response = await fetch(urlBasePHP + "profesoresAsignaturas");
            const data = await response.json();
            listaProfesorAsignatura = data
            //console.log(JSON.stringify(data))
            for(let i = 0; i < data.length; i++) {
                if(data[i].idProfesor != undefined) {
                    listaProfesorAsignatura.push("idProfesor: " + data[i].idProfesor + " idAsignatura: " + data[i].IdAsignatura)
                }
            }
        };
    
        let listaAsignatura = [];     
        var id = "3"
    
        async function dataAsignatura() {
            const response = await fetch(urlBasePHP + 'asignaturas/' + id);
            const data = await response.json();
            listaAsignatura = data
            //console.log(listaAsignatura)
            for(let i = 0; i < data.length; i++) {
                if(data[i].idEstudio === id) {
                    listaAsignatura.push("id: " + data[i].id + " - " + data[i].nombre)
                }
            }
        };
    
        let estudioxAsignatura = [
            { id: "1", text: `id: 1 - Psicologia` },
            { id: "2", text: `id: 2 - Ingeniería Informática` },
            { id: "3", text: `id: 3 - Periodismo` }
        ]
    
    
    onMount(dataEstudio);
    onMount(dataProfesor);
    onMount(dataProfesorAsignatura);
    afterUpdate(dataAsignatura);
    </script>
    
    <Navbar let:hidden let:toggle class="bg-blue-200">
        <NavBrand href="/" >
          <span class="self-center whitespace-nowrap text-xl font-semibold dark:text-white">
            Prueba Técnica
          </span>
        </NavBrand>
        <NavHamburger on:click={toggle} />
        <NavUl {hidden}>
          <NavLi href="/" active={true}>Api Node.js</NavLi>
          <NavLi href="/apiphp">Api PHP</NavLi>
        </NavUl>
      </Navbar>
    
    <main class="py-6 px-4 sm:p-6 md:py-10 md:px-8">
    <div class="mx-auto">

<p class="text-4xl mt-4 mb-4 text-center text-bold">Conexión desde Api PHP</p>
<br>

<div class="max-w-4xl mx-auto grid grid-cols-1 lg:max-w-5xl lg:gap-x-20 lg:grid-cols-2">



<div class="block mx-4 max-w-lg p-6 bg-gray-100 border border-gray-200 rounded-lg shadow hover:bg-blue-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Listado</h5>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <p class="text-xl">Estudios</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                {#each listaEstudio as item}
            {#if item != undefined && item != "[object Object]"}
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {item}
                    </th>
                </tr>
                {/if}
        {/each}	
            </tbody>
        </table>
    </div>
</div>

<div class="block mx-4 max-w-lg p-6 bg-gray-100 border border-gray-200 rounded-lg shadow hover:bg-blue-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Listado</h5>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <p class="text-xl">Profesores</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                {#each listaProfesor as item}
            {#if item != undefined && item != "[object Object]"}
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {item}
                    </th>
                </tr>
                {/if}
        {/each}	
            </tbody>
        </table>
    </div>
</div>

</div>

<br><br>


<div class="mb-8 max-w-4xl mx-auto grid grid-cols-1 lg:max-w-5xl lg:gap-x-20 lg:grid-cols-2">

    
<div class="block mx-4 max-w-lg p-6 bg-gray-100 border border-gray-200 rounded-lg shadow hover:bg-blue-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Listado</h5>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <p class="text-xl">Profesores-Asignaturas</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                {#each listaProfesorAsignatura as item}
            {#if item != undefined && item != "[object Object]"}
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {item}
                    </th>
                </tr>
                {/if}
        {/each}	
            </tbody>
        </table>
    </div>
</div>

<div class="block mx-4 max-w-lg p-6 bg-gray-100 border border-gray-200 rounded-lg shadow hover:bg-blue-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Listado</h5>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una opción</label>
        
        <select bind:value={id} id="asignaturas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            {#each estudioxAsignatura as estudio}
                <option value={estudio.id}>
                    {estudio.text}
                </option>
            {/each}
        </select>


        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <p class="text-xl">Asignaturas</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                {#each listaAsignatura as item}
            {#if item != undefined && item != "[object Object]"}
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {item}
                    </th>
                </tr>
                {/if}
        {/each}	
            </tbody>
        </table>
    </div>
</div>

</div>

<br>

<hr class="w-48 h-1 mx-auto my-4 bg-blue-200 border-0 rounded md:my-10 dark:bg-gray-700">

<br><br><br>

<footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://www.linkedin.com/in/hugo-quintero" class="hover:underline">Hugo Quintero</a>. Prueba Técnica.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <a href="/" class="hover:underline">Api Node.js</a>
        </li>
    </ul>
</footer>

</main>