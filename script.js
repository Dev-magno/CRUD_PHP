function confirmarExclusao(filme_id) {
    if (confirm("Deseja realmente excluir este filme?")) {
        window.location.href = 'excluir.php?id=' + filme_id;
    }
}