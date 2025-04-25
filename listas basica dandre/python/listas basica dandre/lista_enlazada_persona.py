from persona import Persona
from nodo import Nodo

class ListaEnlazadaPersona:
    def __init__(self):
        self.cabeza = None

    def agregar(self, persona):
        nuevo = Nodo(persona)
        if not self.cabeza:
            self.cabeza = nuevo
        else:
            actual = self.cabeza
            while actual.siguiente:
                actual = actual.siguiente
            actual.siguiente = nuevo

    def mostrar(self):
        actual = self.cabeza
        while actual:
            print(actual.persona)
            actual = actual.siguiente

    def mujer_menor_edad(self):
        actual = self.cabeza
        menor = None
        while actual:
            if actual.persona.sexo == "M":
                if menor is None or actual.persona.edad < menor.edad:
                    menor = actual.persona
            actual = actual.siguiente
        return menor

    def hombres_bajo_promedio_mujeres(self):
        actual = self.cabeza
        suma = 0
        conteo = 0
        while actual:
            if actual.persona.sexo == "M":
                suma += actual.persona.edad
                conteo += 1
            actual = actual.siguiente
        if conteo == 0:
            return []
        promedio = suma / conteo

        actual = self.cabeza
        resultado = []
        while actual:
            if actual.persona.sexo == "H" and actual.persona.edad < promedio:
                resultado.append(actual.persona)
            actual = actual.siguiente
        return resultado

    def eliminar_hombres_menores(self):
        actual = self.cabeza
        anterior = None
        while actual:
            if actual.persona.sexo == "H" and actual.persona.edad < 18:
                if anterior:
                    anterior.siguiente = actual.siguiente
                else:
                    self.cabeza = actual.siguiente
                actual = actual.siguiente
                continue
            anterior = actual
            actual = actual.siguiente
