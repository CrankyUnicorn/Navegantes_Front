const { test } = require('@jest/globals');
const unity_t = require('./unity_t');


test(
'do some testing', () => {
expect(unity_t.sub(5-2).toBe(5));
});