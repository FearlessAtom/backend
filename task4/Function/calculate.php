<style>
    .functions table, .functions tr, .functions td
    {
        border: 1px solid black;
    }

    td
    {
        text-align: center;
    }

    h2
    {
        margin: 0;
    }
</style>

<table style="margin-top: 10px; border-collapse: collapse" class="functions">
    <thead style="background-color: #ffff00">
        <tr>
            <td><h2>x&#x02B8;</h2></td>
            <td><h2>x!</h2></td>
            <td><h2>my_tg(x)</h2></td>
            <td><h2>sin(x)</h2></td>
            <td><h2>cos(x)</h2></td>
            <td><h2>tg(x)</h2></td>
        </tr>
    </thead>
    <tr>
        <td><?=power($x, $y)?></td>
        <td><?=factorial($x)?></td>
        <td><?=my_tangent($x)?></td>
        <td><?=sine($x)?></td>
        <td><?=cosine($x)?></td>
        <td><?=tangent($x)?></td>
    </tr>
</table>
