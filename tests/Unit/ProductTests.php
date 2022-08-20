<?php
use function Pest\Laravel\get;

test('has products route', function () {
  get('/dashboard/products')->assertStatus(200);
});
