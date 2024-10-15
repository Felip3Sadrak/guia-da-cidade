using ArujaGuia.Models;
using Microsoft.AspNetCore.Mvc;
using System.Linq;

namespace ArujaGuia.Controllers
{
    public class VagasController : Controller
    {
        private readonly ApplicationDbContext _context;

        public VagasController(ApplicationDbContext context)
        {
            _context = context;
        }

        // Exibe todas as vagas
        public IActionResult Index()
        {
            var vagas = _context.Vagas.ToList();
            return View(vagas);
        }

        // Exibe detalhes de uma vaga
        public IActionResult Details(int id)
        {
            var vaga = _context.Vagas.FirstOrDefault(v => v.Id == id);
            if (vaga == null)
            {
                return NotFound();
            }
            return View(vaga);
        }

        // Criar nova vaga (apenas admin de empresa)
        public IActionResult Create()
        {
            return View();
        }

        [HttpPost]
        public IActionResult Create(Vaga vaga)
        {
            if (ModelState.IsValid)
            {
                _context.Vagas.Add(vaga);
                _context.SaveChanges();
                return RedirectToAction(nameof(Index));
            }
            return View(vaga);
        }
    }
}
