<?php
use function Pest\Laravel\get;

test('has accounting route', function () {
  get('/dashboard/accounting')->assertStatus(200);
});
