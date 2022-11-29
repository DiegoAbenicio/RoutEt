@extends('mapa.showmap')
@section('content')

<!--<div style="width: 100%; height: 35rem" id="mapContainer"></div>-->
<div id="map"></div>
<div class="card shadow mb-4">
    <div class="form-group col-md-6">
        <strong>Escolha o Dia:</strong>
                <form>
                    <div>
                        <label for="dia" class="form-group col-md-7">Escolha a data desejada para gerar a rota:</label>
                        <input type="date" id="dia" name="dia" class="form-group ">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
        </datalist>
    </div>

</div>

@endsection
