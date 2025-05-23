import './bootstrap';

import { applyDecimalFormatterTo } from './utils/decimalFormatters';

document.addEventListener('DOMContentLoaded', () => {
    applyDecimalFormatterTo('[data-format="decimal"]');
});