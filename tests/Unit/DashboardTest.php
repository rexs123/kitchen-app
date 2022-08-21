<?php
use function Pest\Laravel\get;

test('has dashboard route', function () {
  get('/dashboard')->assertStatus(200);
});
