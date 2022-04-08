@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="{{ asset('images/tree.jpg') }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h1>Reforest</h1>

                            <p>El propósito fundamental de la reforestación es mejorar las condiciones medioambientales, ya que como todos sabemos, los bosques producen la mayor parte del oxígeno que respiramos. Además, regulan el clima y forman parte del hábitat natural de muchas especies vegetales y animales.
                            </p>
                            <p>
                                De allí que la importancia de la reforestación radica en garantizar el oxígeno suficiente en la Tierra para la supervivencia de las especies. De igual forma, es indispensable para fundar más extensiones de bosques, a fin de que los árboles garanticen la captación y eliminación de partículas contaminantes, tales como polvo, polen, humo y cenizas, entre otros, que son altamente nocivos para la salud.
                            </p>
                            <p>
                                Hoy más que nunca, la reforestación constituye una actividad vital, ya que la cantidad de incendios y la tala indiscriminada de árboles y otros accidentes, han contribuido a que la concentración verde de nuestro planeta disminuya. Esto trae como consecuencia que el dióxido de carbono que expulsamos con la respiración, no pueda ser transformado en oxígeno, porque sin los árboles ni las plantas, la fotosíntesis es indiscutiblemente imposible.</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
