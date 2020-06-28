using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;
using TrueNotTrue.Models;

namespace TrueNotTrue
{
    public class DataBase : DbContext
    {
        public DbSet<Player> Players { get; set; }
        public DbSet<Move> Moves { get; set; }
        public DbSet<Card> Cards { get; set; }
        public DbSet<WaitModel> WaitModels { get; set; }
    }
}