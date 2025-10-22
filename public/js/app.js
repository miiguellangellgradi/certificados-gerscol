// Mapeo de nombres de entrada a claves del diccionario
const mapeoEntrada = {
  "COROLLA SEDÁN": "COROLLA",
  "YARIS HB": "YARIS",
  "YARIS CROSS": "YARIS CROSS",
  "COROLLA CROSS": "COROLLA CROSS",
  "FORTUNER": "FORTUNER",
  "PRADO": "LAND CRUISER PRADO",
  "LC300": "LAND CRUISER 300",
  "TUNDRA": "TUNDRA",
  "HILUX": "HILUX",
  "HILUX CARGOMAX": "HILUX CARGO MAX",
  "GR SPORT": "GR YARIS"
}

// Diccionario completo de equivalencias
const modelosRelacionados = {
  "COROLLA": "COROLLA SEG HEV",
  "COROLLA CROSS": "COROLLA CROSS SEG",
  "COROLLA CROSS GR-S": "COROLLA CROSS GR-S",
  "FORTUNER": "FORTUNER SRV 4X4 DIESEL 2.8",
  "GR YARIS": "GR YARIS 1.6 TURBO 4WD M/T",
  "HILUX": "HILUX D.C. 4X4 DIESEL 2.8 AT",
  "HILUX CARGO MAX": "HILUX D.C. 4X4 DIESEL 2.8 AT",
  "LAND CRUISER PRADO": "LAND CRUISER PRADO DIESEL TX",
  "LAND CRUISER 300": "LC300 DIESEL ZX",
  "LAND CRUISER": "LAND CRUISER 78",
  "TUNDRA": "TUNDRA D.C. 4X4 GASOLINA 3.4 AT",
  "YARIS": "YARIS SPORT HB CVT",
  "YARIS CROSS": "YARIS CROSS XLS HEV",
  "RAV 4": "RAV4 HEV XLE 2.5 4X4",
  "4RUNNER": "4RUNNER LIMITED"
}

// Normalizar entrada: convertir a mayúsculas y mapear a la clave correcta
const entradaNormalizada = mensajeEntrante.trim().toUpperCase()
const clave = mapeoEntrada[entradaNormalizada] || entradaNormalizada

// Definir valores
const modeloBase = clave
const modeloEspecifico = modelosRelacionados[clave] || "Modelo no encontrado"

// ⚠️ Importante: NO uses 'return'. Simplemente deja este objeto como última línea
({
  modeloBase,
  modeloEspecifico
})