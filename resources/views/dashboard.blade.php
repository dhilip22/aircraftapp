<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <?php $boot = session('boot') ?>
        @if($boot == 0)
        <a class="float-right" href="{{ route('aircrafts.boot') }}" style="margin-top: -27px; margin-left: 10px;">
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
  {{ __('Boot') }}
</button></a>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!--<x-jet-welcome />-->
                
                <div class="text-gray-600 dark:text-gray-400" style="padding: 10px;">
                    An aircraft is a vehicle that is able to fly by gaining support from the air. It counters the force of gravity by using either static lift or by using the dynamic lift of an airfoil, or in a few cases the downward thrust from jet engines. Common examples of aircraft include airplanes, helicopters, airships (including blimps), gliders, paramotors and hot air balloons.
                    <br>
                    <br>
                    The human activity that surrounds aircraft is called aviation. The science of aviation, including designing and building aircraft, is called aeronautics. Crewed aircraft are flown by an onboard pilot, but unmanned aerial vehicles may be remotely controlled or self-controlled by onboard computers. Aircraft may be classified by different criteria, such as lift type, aircraft propulsion, usage and others.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
