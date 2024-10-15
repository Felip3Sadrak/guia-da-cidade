namespace ArujaGuia.Models
{
    public class Candidatura
    {
        public int Id { get; set; }
        public Vaga Vaga { get; set; }
        public Candidato Candidato { get; set; }
        public DateTime DataCandidatura { get; set; }
        public string Status { get; set; } // Status: "Em análise", "Aprovado", "Rejeitado"
    }
}
