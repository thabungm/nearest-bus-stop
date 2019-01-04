
<?php if ($busList->count() == 0) {
    echo "<div class='row text-center'>No Buses found for the Bus Stop!</div>";
    die();
}?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.no</th>
            <th>Bus Name</th>
            <th>From</th>
            <th>To</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    @foreach($busList as $d)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->from_route}} </td>
            <td>{{$d->to_route}}</td>
        </tr>
    @endforeach
    </tbody>
</table>