namespace TrueNotTrue.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class TrueNotTrueDataBase : DbMigration
    {
        public override void Up()
        {
            AddColumn("dbo.WaitModels", "PlayerOneId", c => c.String());
            AddColumn("dbo.WaitModels", "PlayerTwoId", c => c.String());
            DropColumn("dbo.WaitModels", "ConnectionId");
            DropColumn("dbo.WaitModels", "Position");
            DropTable("dbo.Games");
            DropTable("dbo.Trashes");
            DropTable("dbo.Values");
        }
        
        public override void Down()
        {
            CreateTable(
                "dbo.Values",
                c => new
                    {
                        Id = c.Int(nullable: false, identity: true),
                        OneCard = c.String(),
                        TwoCard = c.String(),
                        ThreeCard = c.String(),
                        FourCard = c.String(),
                    })
                .PrimaryKey(t => t.Id);
            
            CreateTable(
                "dbo.Trashes",
                c => new
                    {
                        Id = c.Int(nullable: false, identity: true),
                        GameId = c.Int(nullable: false),
                        CountCards = c.Int(nullable: false),
                        ValueCards = c.String(),
                    })
                .PrimaryKey(t => t.Id);
            
            CreateTable(
                "dbo.Games",
                c => new
                    {
                        Id = c.Int(nullable: false, identity: true),
                        PlayerOneId = c.Int(),
                        PlayerTwoId = c.Int(),
                    })
                .PrimaryKey(t => t.Id);
            
            AddColumn("dbo.WaitModels", "Position", c => c.Int(nullable: false));
            AddColumn("dbo.WaitModels", "ConnectionId", c => c.String());
            DropColumn("dbo.WaitModels", "PlayerTwoId");
            DropColumn("dbo.WaitModels", "PlayerOneId");
        }
    }
}
