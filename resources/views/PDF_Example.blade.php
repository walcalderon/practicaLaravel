
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
            table {
              width: 100%;
              text-align: center;
              border-collapse: collapse;
            } 
            th, td{
                border: solid 1px;
                padding: 0px;
            }
            .nbordes th{
                border: none ;
            }
          </style>
</head>
<body>
<div class="mt-4">
    <table>
        <tr>
            <td>
            <?php
               echo "<img src='asset('storage/img/logo300.jpg')'>";
            // echo asset('storage/img/logo300.jpg');
                ?>
            </td>
            <td>
            <h3>Gobierno de El Salvador</h3>
            <h4>Ministerio de Eduacion</h4>
            </td>
        </tr>
    </table>
 
    
  
</div>
<br>
<br>
<br>

<div class="mt-4">
                        <table >
                            <thead class="border-black text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                     <th style="border: none;" colspan="2"></th>
                                     <th colspan="3">Fondos</th>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2">{{ __('Nombre') }}</th>
                                    <th class="px-4 py-2">{{ __('Fuente Fondos') }}</th>
                                    <th class="px-4 py-2">{{ __('Planificado') }}</th>
                                    <th class="px-4 py-2">{{ __('Patrocinado') }}</th>
                                    <th class="px-4 py-2">{{ __('Propios') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs font-thin divide-y divide-gray-100">
                                @forelse ($proyectos as $proyecto)
                                <tr>
                                    <td class="border px-4 py-2">{{ $proyecto->NombreProyecto }}</td>
                                    <td class="border px-4 py-2">{{ $proyecto->fuenteFondos}}</td>
                                    <td class="border px-4 py-2">{{ number_format($proyecto->MontoPlanificado,2)}}</td>
                                    <td class="border px-4 py-2">{{ number_format($proyecto->MontoPatrocinado,2)}}</td>
                                    <td class="border px-4 py-2">{{ number_format($proyecto->MontoFondosPropios,2)}}</td>
                                </tr>
                                @empty
                                <tr class="bg-red-400 text-white text-center">
                                    <td colspan="3" class="border px-4 py-2">{{ __('No hay proyectos para mostrar') }}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

</body>
</html>