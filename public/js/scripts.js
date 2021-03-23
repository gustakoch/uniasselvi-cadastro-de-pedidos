jQuery(function() {
    $('#cpf').mask('000.000.000-00', {reverse: true});

    let form = document.querySelector('#form-create-produto')
    let divButtons = document.querySelector('.buttons')
    let inputTotalPedido = document.querySelector('#total_pedido')

    let buttonAddProduto = document.querySelector('.add')
    let selectProdutos = document.querySelectorAll('.produto')
    let inputsQtde = document.querySelectorAll('.qtde')

    let valorProdutoUnitario
    let produtos

    async function getAllProdutos() {
        const response = await axios.get('/api/pedidos/produtos', {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        produtos = response.data
    }

    getAllProdutos()

    if (!buttonAddProduto) {
        return false
    }

    buttonAddProduto.addEventListener('click', function(e) {
        e.preventDefault()

        let divAtual = this.parentNode.parentNode
        let newDiv = document.createElement('div')
        newDiv.classList.add('form-row')

        newDiv.innerHTML = `
            <div class="col-md-4 mb-3">
                <select class="form-control produto" name="produto[]">
                    <option value="">Selecione um produto</option>
                    ${produtos.map(produto => {
                        return "<option value='" + produto.id + "'>" + produto.nome + "</option>"
                    }).join("")}
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <input type="text" class="form-control" id="valor_unitario" value="0" readonly>
            </div>
            <div class="col-md-3 mb-3">
                <input type="number" class="form-control qtde" name="qtde[]" value="0">
            </div>
            <div class="col-md-2 mb-3">
                <input type="text" class="form-control total_produto" value="0" readonly>
            </div>
            <div class="col-md-1 mb-3 mais-produto-box" style="margin-top: 0">
                <button class="add-remove-produto remove" title="Remover produto">
                    <i class="fas fa-minus fa-lg"></i>
                </button>
            </div>
        `

        divAtual.parentNode.insertBefore(newDiv, divAtual.nextSibling);
    })

    $(form).on('click', '.remove', function(e) {
        e.preventDefault()

        this.parentNode.parentNode.remove()
    })

    selectProdutos.forEach(function(select) {
        $(form).on('change', '.produto', function(e) {
            e.preventDefault()

            let produtoId = this.value
            let valorUnitarioInput = this.parentNode.nextElementSibling.childNodes[3]

            if (!valorUnitarioInput) {
                valorUnitarioInput = this.parentNode.nextElementSibling.childNodes[1]
            }

            $.ajax({
                url: '/api/pedidos/produto?id=' + produtoId,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(result) {
                    valorUnitarioInput.value = `R$ ${result.valor}`

                    valorProdutoUnitario = result.valor
                }
            })
        })
    })

    inputsQtde.forEach(function(input) {
        $(form).on('focusout', '.qtde', function(e) {
            e.preventDefault()

            let inputTotal = this.parentNode.nextElementSibling.childNodes[3]
            if (!inputTotal) {
                inputTotal = this.parentNode.nextElementSibling.childNodes[1]
            }

            if (!valorProdutoUnitario) {
                return false
            }

            let valorTotal = Number(valorProdutoUnitario.replace('.', '').replace(',', '.')) * Number(this.value)

            inputTotal.value = valorTotal.toLocaleString('pt-BR', {
                currency: 'BRL',
                style: 'currency'
            })
        })
    })
})
