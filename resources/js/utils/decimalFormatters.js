export function formatAsDecimal(input) {
    let value = input.value.replace(/\D/g, '');
    value = value.replace(/^0+/, '');

    if (value === '') {
        input.value = '0.00';
        return;
    }

    if (value.length < 3) {
        value = value.padStart(3, '0');
    }

    const formatted = value.slice(0, -2) + '.' + value.slice(-2);
    input.value = formatted;
}

export function applyDecimalFormatterTo(selector) {
    const inputs = document.querySelectorAll(selector);
    inputs.forEach(input => {
        input.addEventListener('input', () => formatAsDecimal(input));
    });
}