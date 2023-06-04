<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    #centro {
      border: 1px solid black;
      border-radius: 40px;
    }
  </style>

  <title>Immobile - Casas disponíveis</title>
</head>

<body>

  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light justify-content-center px-4 px-lg-5 py-3 py-lg-0 bg-white">
      <div class='navbar-nav py-0'>
        <a class='nav-item nav-link' href="{{ route('casas.index') }}">Casas</a>
        <a class='nav-item nav-link' href="{{ route('casas.venda') }}">Casas à venda</a>
        <a class='nav-item nav-link' href="{{ route('casas.aluguel') }}">Casas para alugar</a>
        <a class='nav-item nav-link' href="{{ route('casas.create') }}">Adicionar casa</a>
        <a class='nav-item nav-link' href="{{ route('casas.maisCara') }}">Casa mais cara</a>
        <a class='nav-item nav-link' href="{{ route('casas.ordenarPorPreco') }}">Ordenar por preço</a>
        <a class='nav-item nav-link' href="{{ route('casas.ordenarPorEndereco') }}">Ordenar por endereço</a>
      </div>
    </nav>

    <!-- Exibir detalhes da casa -->
    <div class="container position-absolute top-50 start-50 translate-middle w-75 h-75 d-flex align-items-evenly justify-items-center row" id="centro">
      <h1 class="text-center">Detalhes da Casa</h1>

      <p><strong>Nome da Imobiliária:</strong> {{ $casa->imobiliaria }}</p>
      <p><strong>Endereço:</strong> {{ $casa->endereco }}</p>
      <p><strong>Preço:</strong> {{ $casa->preco }}</p>
      <p><strong>Venda/Aluguel:</strong> {{ $casa->vendaAluguel ? 'Venda' : 'Aluguel' }}</p>


      <form action="{{ route('casas.destroy', $casa->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <a class="btn btn-primary" href="{{ route('casas.edit', $casa->id) }}">Editar</a>
        <button class="btn btn-danger" type="submit">Excluir</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>