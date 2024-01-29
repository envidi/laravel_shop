<form action="/unicode" method="POST">
    <!-- @csrf -->
    <div>
        <input type="text" name="username" placeholder="Username">
        <!-- <input type="hidden" name="_method" value="PUT"> -->
        <!-- <input type="hidden" name="_method" value="DELETE"> -->
        <input type="hidden" name="_token" value="<?= csrf_token();  ?>">
    </div>

    <button type="submit">
        Submit
    </button>
</form>