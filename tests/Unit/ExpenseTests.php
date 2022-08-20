<?php
use function Pest\Laravel\get;

test('has expenses route', function () {
  get('/dashboard/expenses')->assertStatus(200);
});
