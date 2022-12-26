/**
 * Membuat funsi menghitung luas lingkaran.
 * Fungsi dibuat dengan gaya Function Declaration
 *  
 *  @param {number} radius (jari -jari)
 * @returns {number} area (luas lingkaran)
 */
function calcAreaofCircle(radius){
    const PHI = 3.14;
    const area = PHI * radius * radius;
    return area;
}

// memanggil fungsi dengan mengirimkan parameter
console.log(calcAreaofCircle(5));
console.log(calcAreaofCircle(6));
console.log("\n");

/**
 * arrow function
 * Membuat funsi menghitung luas lingkaran.
 * Fungsi dibuat dengan gaya Function Declaration
 *  
 *  @param {number} radius (jari -jari)
 * @returns {number} area (luas lingkaran)
 */

const calcAreaof = (radius) => {
    const PHI = 3.14;
    const area = PHI * radius * radius;
    return area;
}

// memanggil fungsi dengan mengirimkan parameter
console.log(calcAreaofCircle(5));
console.log(calcAreaofCircle(6));
console.log("\n");

// Persingkat arrow function
const hitungLuasLingkaran = (jarijari) => 3.14 * jarijari * jarijari;

console.log(hitungLuasLingkaran(5));
