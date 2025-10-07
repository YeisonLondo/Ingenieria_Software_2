from locust import HttpUser, task

class PruebasUsuarios(HttpUser):

    @task
    def crear_usuario(self):
        
        data = {
            "name": "David Salazar",
            "peso": 77,
            "altura": 1.80,
            "telefono": "3742392046",
            "direccion": "Calle 20-44",
            "fecha_nacimiento": "1999-02-16",
            "email": "David@gmail.com",
        }

        self.client.put("/api/user/11", json=data)
