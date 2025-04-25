class Persona:
    def __init__(self, nombre, edad, sexo):
        self.nombre = nombre
        self.edad = edad
        self.sexo = sexo  # "M" para mujer, "H" para hombre

    def __str__(self):
        tipo = "Mujer" if self.sexo == "M" else "Hombre"
        return f"{self.nombre}, {self.edad} años, {tipo}"
