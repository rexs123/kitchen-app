<?php
use function Pest\Laravel\get;

test('has orders route', function () {
  get('/dashboard/orders')->assertStatus(200);
});
