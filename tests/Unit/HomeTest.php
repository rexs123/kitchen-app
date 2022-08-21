<?php
use function Pest\Laravel\get;

test('has home route', function () {
  get('/')->assertStatus(200);
});
