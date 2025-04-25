from persona import Persona
from lista_enlazada_persona import ListaEnlazadaPersona

lista = ListaEnlazadaPersona()

lista.agregar(Persona("Ana", 25, "M"))
lista.agregar(Persona("Laura", 19, "M"))
lista.agregar(Persona("Pedro", 16, "H"))
lista.agregar(Persona("Carlos", 20, "H"))
lista.agregar(Persona("Luis", 30, "H"))
lista.agregar(Persona("Marta", 18, "M"))
lista.agregar(Persona("Juan", 17, "H"))

print("🔸 Lista original:")
lista.mostrar()

print("\n👩 Mujer con menor edad:")
print(lista.mujer_menor_edad())

print("\n👨‍🦱 Hombres con edad menor al promedio de mujeres:")
for p in lista.hombres_bajo_promedio_mujeres():
    print(p)

print("\n🧹 Eliminando hombres menores de edad...")
lista.eliminar_hombres_menores()

print("\n✅ Lista después de eliminar hombres menores:")
lista.mostrar()
