# 💪 Sistema Academia Força Total

Sistema de gestão para academias, desenvolvido para organizar o cadastro de alunos, professores, treinos, acompanhamento físico e venda de produtos e serviços.

---

## 📦 Funcionalidades

✅ Cadastro de Alunos  
✅ Cadastro de Professores  
✅ Cadastro de Planos de Treinamento  
✅ Controle de Fichas de Treino  
✅ Registro de Exercícios por Ficha  
✅ Acompanhamento de Medidas e Evolução dos Alunos  
✅ Controle de Produtos e Serviços (Estoque e Comercialização)  
✅ Sistema de Usuários com Níveis de Acesso  
✅ Recuperação de Senha para Usuários  
✅ Relacionamento completo entre as entidades  

---

## 🗄️ Estrutura do Banco de Dados (MySQL)

O sistema utiliza MySQL 8+, estruturado da seguinte forma:

### Tabelas Principais

- **alunos**  
  Cadastro completo de alunos, vinculados a planos e usuários do sistema.

- **professores**  
  Cadastro de professores com especialidade e vínculo ao usuário do sistema.

- **usuario**  
  Controle de usuários da aplicação com níveis de acesso:
    - 1 = Super Administrador  
    - 11 = Administrador  
    - 21 = Usuário Comum  

- **usuariorecuperasenha**  
  Sistema de recuperação de senha com tokens e status.

- **planos**  
  Definição dos planos de treino (nome, valor, quantidade de treinos semanais).

- **exercicios**  
  Cadastro dos exercícios, agrupados por grupo muscular.

- **fichas_treino**  
  Fichas personalizadas para os alunos, com validade, professor responsável e anotações.

- **ficha_exercicio**  
  Relação entre fichas e exercícios, contendo séries, repetições e carga.

- **acompanhamentos**  
  Registro do acompanhamento físico do aluno, incluindo peso, medidas e frequência.

- **produtos_servicos**  
  Cadastro de produtos e serviços comercializados na academia, com estoque, imagem, tipo (produto ou serviço) e status.

---

## 🔐 Relacionamentos Importantes

- `alunos` → `planos`  
- `alunos` → `usuario`  
- `professores` → `usuario`  
- `fichas_treino` → `alunos` e `professores`  
- `ficha_exercicio` → `fichas_treino` e `exercicios`  
- `acompanhamentos` → `fichas_treino`  
- `usuariorecuperasenha` → `usuario`  

----


![Muriae-GYM-17](https://github.com/user-attachments/assets/0e078491-c04d-43e5-a767-97a1609e0dcd)
![Muriae-GYM-16](https://github.com/user-attachments/assets/3498a20b-a3b1-42db-9c45-8cda68707d51)
![Muriae-GYM-15](https://github.com/user-attachments/assets/44b7aa89-6768-48cf-bd57-cd22912a230c)
![Muriae-GYM-14](https://github.com/user-attachments/assets/2d6bd5bb-42a6-4878-93fb-baf56d5dc8f6)
![Muriae-GYM-13](https://github.com/user-attachments/assets/2dbd0953-6aab-43fc-bc97-fa8380b41c8a)
![Muriae-GYM-12](https://github.com/user-attachments/assets/fa177540-a189-4d7f-812c-abc48d0ffb75)
![Muriae-GYM-11](https://github.com/user-attachments/assets/ecbda3cf-0f12-4718-91c5-f30547b0f559)
![Muriae-GYM-10](https://github.com/user-attachments/assets/88048142-49b6-4417-9a3e-15f8fe486d0a)
![Muriae-GYM-9](https://github.com/user-attachments/assets/6ba972d6-909f-4ee5-8162-a6aafc9870df)
![Muriae-GYM-8](https://github.com/user-attachments/assets/97510fd0-7726-429b-a57d-dc2b5552be4a)
![Muriae-GYM-7](https://github.com/user-attachments/assets/35aca605-465e-446e-967f-7086ea57fafc)
![Muriae-GYM-6](https://github.com/user-attachments/assets/4396bb05-f4fd-4f20-a6d6-b9e5df6ef393)
![Muriae-GYM-5](https://github.com/user-attachments/assets/b699dafb-77b4-40ae-8f99-2dfb98eb8b9f)
![Muriae-GYM-4](https://github.com/user-attachments/assets/81968881-3a04-432a-b3bb-283e989f4b49)
![Muriae-GYM-3](https://github.com/user-attachments/assets/855f30ff-9e15-4d28-a78e-c2fe7d150e24)
![Muriae-GYM-2](https://github.com/user-attachments/assets/2cb73f57-066a-4a1c-903c-a7dde378d1dc)
![Muriae-GYM-1](https://github.com/user-attachments/assets/bb2439b3-7be1-48ae-8cb2-15dbd478eb8f)


