<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Your Account Details</h2>
            <div class="card">
                <div class="card-body">
                <p>Name : <?= session()->get('name') ?></p>
                <p>Email : <?= session()->get('email') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>