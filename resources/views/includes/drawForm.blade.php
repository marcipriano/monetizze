<form action="{{ route('draw') }}" method="POST">
    {{ csrf_field() }}
    <h1>
        Configurar Aposta
    </h1>

    <div class="row mb-3">
        <div class="col-6">
            <label for="quantityGames" class="form-label">Quantidade de Jogos</label>
            <select required name="quantityGames" id="quantityGames" class="form-control" aria-label="Default select example">
                <option value="4">Quatro</option>
                <option value="5">Cinco</option>
                <option value="6">Seis</option>
            </select>
        </div>

        <div class="col-6">
            <label for="quantityDozens" class="form-label">Quantidade de Dezenas</label>
            <select required name="quantityDozens" id="quantityDozens" class="form-control" aria-label="Default select example">
                <option value="6">Seis</option>
                <option value="7">Sete</option>
                <option value="8">Oito</option>
                <option value="9">Nove</option>
                <option value="10">Dez</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-lg btn-success w-100">
                Iniciar Sorteio
            </button>
        </div>
    </div>
</form>
