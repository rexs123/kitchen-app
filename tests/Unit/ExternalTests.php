<?php
use function Pest\Laravel\get;

test('has external route', function () {
  get('/external/orders')->assertStatus(200);
});
